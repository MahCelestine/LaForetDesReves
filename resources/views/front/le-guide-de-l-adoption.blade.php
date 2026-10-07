<x-layout>
    <div class="md:py-10 py-4 xl:px-40 md:px-5 max-md:px-2">
        <h2 class="sub-title">Foire aux questions</h2>
        <h1 class="title">Vos questions, nos réponses</h1>
        <h3 class="title-description">Retrouvez ici les réponses aux questions les plus fréquentes de nos familles
            adoptantes. Nous restons disponible pour tout complément.</h3>
    </div>

    <section class="md:px-5 max-md:px-2 xl:px-40 faq-section">
        <div class="faq-group" x-data="{ open: 0 }">
            <div class="faq-group-header">
                <img src="{{ asset('images/icon/Booking.png') }}" aria-hidden="true" class="faq-group-icon">
                <h3>Modalité de réservation</h3>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question" @click="open = (open === 0 ? null : 0)"
                    :aria-expanded="open === 0">
                    <h4>Comment s'inscrire sur la liste d'attente ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 0 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 0" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question" @click="open = (open === 1 ? null : 1)"
                    :aria-expanded="open === 1">
                    <h4>Quelles sont les conditions pour valider une réservation ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 1 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 1" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>

            <div class="faq-item faq-item--last">
                <button type="button" class="faq-question" @click="open = (open === 2 ? null : 2)"
                    :aria-expanded="open === 2">
                    <h4>Le versement d'un acompte est-il obligatoire ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 2 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 2" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="md:px-5 max-md:px-2 xl:px-40 faq-section">
        <div class="faq-group" x-data="{ open: 1 }">
            <div class="faq-group-header">
                <img src="{{ asset('images/icon/Dog Sit.png') }}" aria-hidden="true" class="faq-group-icon">
                <h3>Le choix du chiot</h3>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question" @click="open = (open === 0 ? null : 0)"
                    :aria-expanded="open === 0">
                    <h4>À quel âge peut-on choisir son chiot ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 0 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 0" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question" @click="open = (open === 1 ? null : 1)"
                    :aria-expanded="open === 1">
                    <h4>À quel âge peut-on choisir son chiot ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 1 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 1" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>

            <div class="faq-item faq-item--last">
                <button type="button" class="faq-question" @click="open = (open === 2 ? null : 2)"
                    :aria-expanded="open === 2">
                    <h4>Est-il possible de visiter l'élevage pour choisir le chiot ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 2 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 2" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="md:px-5 max-md:px-2 xl:px-40 faq-section">
        <div class="faq-group" x-data="{ open: 1 }">
            <div class="faq-group-header">
                <img src="{{ asset('images/icon/Day and Night.png') }}" aria-hidden="true" class="faq-group-icon">
                <h3>Le jour du départ et jour d'arrivée</h3>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question" @click="open = (open === 0 ? null : 0)"
                    :aria-expanded="open === 0">
                    <h4>Quels documents nous remettez-vous le jour du départ ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 0 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 0" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera
                        à régler au maximum le jour du départ du chiot.</p>
                </div>
            </div>

            <div class="faq-item faq-item--last">
                <button type="button" class="faq-question" @click="open = (open === 1 ? null : 1)"
                    :aria-expanded="open === 1">
                    <h4>Que devons-nous préparer et apporter pour le jour J ?</h4>
                    <i class="bi bi-chevron-down faq-arrow" :class="{ 'faq-arrow-open': open === 1 }"></i>
                </button>
                <div class="faq-answer" x-show="open === 1" x-collapse x-transition:enter="faq-answer-enter"
                    x-transition:enter-start="faq-answer-enter-start" x-transition:enter-end="faq-answer-enter-end"
                    x-transition:leave="faq-answer-leave" x-transition:leave-start="faq-answer-leave-start"
                    x-transition:leave-end="faq-answer-leave-end">
                    <p>Pour le trajet, prévoyez une caisse de transport sécurisée, une laisse, un collier (ou harnais)
                        et une couverture. De notre côté, nous vous fournirons un kit chiot avec ses croquettes
                        habituelles pour démarrer sereinement.</p>
                </div>
            </div>
        </div>
    </section>

    <x-footer-dossier />
</x-layout>

@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Comment s'inscrire sur la liste d'attente ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "Quelles sont les conditions pour valider une réservation ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "Le versement d'un acompte est-il obligatoire ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "À quel âge peut-on choisir son chiot ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "Est-il possible de visiter l'élevage pour choisir le chiot ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "Quels documents nous remettez-vous le jour du départ ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, un acompte est demandé pour bloquer définitivement votre réservation. Le solde restant sera à régler au maximum le jour du départ du chiot."
      }
    },
    {
      "@type": "Question",
      "name": "Que devons-nous préparer et apporter pour le jour J ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pour le trajet, prévoyez une caisse de transport sécurisée, une laisse, un collier (ou harnais) et une couverture. De notre côté, nous vous fournirons un kit chiot avec ses croquettes habituelles pour démarrer sereinement."
      }
    }
  ]
}
</script>
@endverbatim