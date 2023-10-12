import WelcomeCard from './components/WelcomeCard.vue'

Nova.booting(app => {
    app.component('nova-welcome-card', WelcomeCard)
})
