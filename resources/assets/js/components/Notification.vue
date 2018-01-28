<template>
  <span></span>
</template>


<script>
export default {
  mounted() {
    axios.get('/api/user').then(res => {
      this.$store.commit('AUTH_USER_DATA', res.data)
      this.listen()
    })
  },
  methods: {
    listen() {
      Echo.private('App.User.' + this.$store.state.auth_user.id).notification(
        notification => {
          noty(notification.message)
          this.$store.commit('ADD_NOT', notification)
          document.getElementById('noty_audio').play()
        }
      )
    }
  }
}
</script>
