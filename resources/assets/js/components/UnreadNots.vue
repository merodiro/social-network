<template>
  <li class="nav-item ml-3 ml-md-0">
    <a class="nav-link" href="/notifications">
      Unread Notifications
      <span class="badge badge-info">{{ all_nots_count }}</span>
    </a>
  </li>
</template>

<script>
export default {
  mounted() {
    this.get_unread()
  },
  methods: {
    get_unread() {
      axios.get('/api/get_unread').then(res => {
        res.data.forEach(not => {
          this.$store.commit('ADD_NOT', not)
        })
      })
    }
  },
  computed: {
    all_nots_count() {
      return this.$store.getters.all_nots_count
    }
  }
}
</script>
