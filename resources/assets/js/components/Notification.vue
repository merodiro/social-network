<template>
    <div>
        
    </div>
</template>

<script>
    export default {
        mounted() {
            this.listen()
        },
        props: ['id'],
        methods: {
            listen() {
                Echo.private('App.User.' + this.id)
                    .notification( (notification) => {
                        noty({
                            text: notification.message
                        })
                        this.$store.commit('ADD_NOT', notification)
                        document.getElementById('noty_audio').play()
                    })
            }
        }
    }
</script>