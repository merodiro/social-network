<template>
    <form class="form-inline my-2 my-md-0 ml-3 ml-md-0 dropdown">
        <input type="text" class="form-control" placeholder="Search for other users" v-model="query">
        <div class="dropdown-menu dropdown-menu-right" :class="{'show':opened}">
            <a v-for="user in results" :key="user" class="dropdown-item my-1" :href="'/profile/'+user.slug">
                <img :src="user.avatar" class="search-avatar">
                {{user.name}}
            </a>
        </div>
    </form>
</template>

<script>
    export default {
        data () {
            return {
                query: '',
                results: []
            }
        },
        watch: {
            query () {
                this.search()
            }
        },
        computed: {
           opened() {
                if (this.results.length>0) {
                    return true
                } else {
                    return false
                }
           }
        },
        methods: {
            search: _.debounce(
                function function_name(argument) {
                    if (_.trim(this.query) != '') {
                        axios.post('/api/search', {query: this.query})
                        .then(res => {
                            this.results = res.data
                        })
                    }
                }, 500)
        }
    }
</script>

<style>
    .search-avatar {
        border-radius: 50%;
        width: 50px;
    }
</style>