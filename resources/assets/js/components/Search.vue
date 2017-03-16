<template>
    <form class="navbar-form navbar-left" role="search">
        <div class="input-group">
            <div class="input-group-btn" :class="{'open':opened}">
                <input type="text" class="form-control" placeholder="Search for other users" v-model="query">
                <ul class="dropdown-menu" v-if="results && query">
                    <li v-for="user in results">
                        <a :href="'/profile/'+user.slug">
                            <img :src="user.avatar" class="search-avatar">
                            {{user.name}}
                        </a>
                    </li>
                </ul>
            </div>
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
                        console.log(_.trim(this.query))
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