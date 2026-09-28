<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Breed;
use App\Models\Puppy;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'breed_id' => 'required|exists:breeds,id',
            'puppy_id' => 'nullable|string',
            'housing' => 'required|string',
            'canine_experience' => 'nullable|string',
            'children' => 'nullable|string',
            'other_pets' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Veuillez renseigner votre nom.',
            'surname.required' => 'Veuillez renseigner votre prénom.',
            'email.required' => 'Votre adresse e-mail est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'address.required' => 'Veuillez renseigner votre adresse postale.',
            'breed_id.required' => 'Veuillez sélectionner une race.',
            'breed_id.exists' => 'La race sélectionnée est invalide.',
            'housing.required' => 'Veuillez indiquer la situation de votre logement.',
            'message.required' => 'Le message ne peut pas être vide.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        $breed = Breed::find($validated['breed_id']);
        $validated['breed_name'] = $breed ? $breed->name : 'Non spécifiée';

        if ($validated['puppy_id'] === 'waiting_list') {
            $validated['puppy_name'] = "Inscription sur liste d'attente";
        } elseif ($validated['puppy_id']) {
            $puppy = Puppy::find($validated['puppy_id']);
            $validated['puppy_name'] = $puppy ? $puppy->name : 'Chiot non trouvé';
        } else {
            $validated['puppy_name'] = 'Aucun chiot sélectionné';
        }

        $ownerEmail = config('mail.from.address');

        Mail::to($ownerEmail)->send(new ContactFormMail($validated));

        return back()->with('success', 'Votre dossier a bien été envoyé !');
    }

    public function create()
    {
        $breeds = Breed::all();
        $puppies = Puppy::where('status', 'disponible')
            ->with('litter:id,breed_id')
            ->get(['id', 'name', 'litter_id', 'birth_date'])
            ->map(function ($puppy) {
                return [
                    'id' => $puppy->id,
                    'name' => $puppy->name,
                    'breed_id' => $puppy->litter->breed_id ?? null,
                ];
            });
        return view('front.contact', compact('breeds', 'puppies'));
    }
}