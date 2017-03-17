<template>
    <div>
        <p v-if="loading" class="text-center">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-success" v-if="!status" @click="add_friend">Add Friend</button>
            <button class="btn btn-success" v-if="status == 'pending'" @click="accept_friend">Accept Friend</button>
            <button class="btn btn-danger" v-if="status == 'waiting'" @click="delete_friend()">Cancel friend request</button>
            <button class="btn btn-danger" v-if="status == 'friends'" @click="delete_friend()">Unfriend</button>
        </p>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/friend/check/' + this.profile_user_id)
                .then(res => {
                    this.status = res.data.status
                    this.loading = false
                })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            add_friend() {
                this.loading = true
                axios.get('/api/friend/add/'+ this.profile_user_id)
                    .then(res => {
                        console.log(res)
                        if (res.data) {
                            this.status ="waiting"
                            noty({
                                text: 'Friend request sent sent'
                            }) 
                            this.loading = false
                        }
                    })
            },
            accept_friend() {
                this.loading = true
                axios.get('/api/friend/accept/'+ this.profile_user_id)
                    .then(res => {
                        if (res.data) {
                            this.status ="friends"
                             noty({
                                text: 'you are now friends'
                            })  
                            this.loading = false
                        }
                    })
            },
            delete_friend() {
                this.loading = true
                axios.get('/api/friend/delete/' + this.profile_user_id)
                    .then(res => {
                        if (res.data) {
                            this.status = ''
                            this.loading = false
                        }
                    })
            }
        }
    }
</script>
