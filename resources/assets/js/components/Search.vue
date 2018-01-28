<template>
  <form class="form-inline my-2 my-md-0 ml-3 ml-md-0 dropdown">
    <input type="text" class="form-control" placeholder="Search for other users" v-model="query">
    <div class="dropdown-menu dropdown-menu-right" :class="{'show':opened}">
      <a v-for="user in results" :key="user.id" class="dropdown-item my-1" :href="'/profile/'+user.slug">
        <img :src="user.avatar" class="search-avatar"> {{user.name}}
      </a>
    </div>
  </form>
</template>

<script>
import { createFromAlgoliaCredentials } from 'vue-instantsearch'

const searchStore = createFromAlgoliaCredentials(
  process.env.MIX_ALGOLIA_APP_ID,
  process.env.MIX_ALGOLIA_SEARCH
)
searchStore.start()
searchStore.indexName = 'users'
searchStore.resultsPerPage = 3

export default {
  data() {
    return {
      query: '',
      results: []
    }
  },
  watch: {
    query() {
      this.search()
    }
  },
  computed: {
    opened() {
      return this.results.length > 0
    }
  },
  methods: {
    search: _.debounce(function function_name(argument) {
      if (_.trim(this.query) != '') {
        searchStore.query = this.query
        this.results = searchStore.results
      } else {
        this.results = []
      }
    }, 100)
  }
}
</script>

<style>
.search-avatar {
  border-radius: 50%;
  width: 50px;
}
</style>
