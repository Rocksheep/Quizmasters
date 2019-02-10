<template>
    <div class="d-flex justify-content-center align-content-center align-items-center" style="height:100%;">
        <div class="card" style="width: 30rem;">
            <img src="/img/join.png" alt="Quizmaster" class="card-img-top">
            <div class="card-body">
                <h1 class="card-title">You are now joining {{ joinCode }}</h1>
                <p class="card-text">Please set a username if you want to continue</p>
                <form method="post" v-on:submit.once.prevent="sendUsername()">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="joinCode" class="form-control" v-model="username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Quiz",
        data() {
            return {
                username: '',
                joinCode: null
            };
        },
        created() {
            this.joinCode = this.$route.params.joinCode;
            console.log("joined " + this.joinCode);
            //
            // Echo.channel('rooms')
            //     .listen('.rooms.userJoined', (event) => {
            //         console.log(event);
            //         this.players.push({
            //             name: event.username
            //         });
            //     });
        },
        methods: {
            sendUsername: function() {
                this.username = "";
            }
        }
    }
</script>

<style scoped>

</style>