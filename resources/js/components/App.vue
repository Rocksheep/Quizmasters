<template>
    <div class="d-flex justify-content-center align-content-center align-items-center" style="height:100%;">
        <div class="card" style="width: 30rem;">
            <img src="img/join.png" alt="Quizmaster" class="card-img-top">
            <div class="card-body">
                <h1 class="card-title">Welcome to QUIZMASTER</h1>
                <p class="card-text">Grab a seat and get ready to answer our mind blowing questions!</p>
                <form method="post" v-on:submit.once.prevent="joinGame()">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="joinCode" class="form-control" v-model="joinCode" placeholder="Enter room code"/>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="javascript:void(0);" class="card-link mx-2" @click="createGame()">Create new room</a>
                        <button type="submit" class="btn btn-primary">Join room</button>
                    </div>
                </form>
            </div>
        </div>
        <ul>
            <li v-for="player in players">{{ player.name }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                joinCode: '',
                players: []
            }
        },
        mounted() {
            Echo.channel('quizzes')
                .listen('userJoined', (event) => {
                    this.players.push({
                        name: event.username
                    });
                });
        },
        methods: {
            joinGame: function() {
                console.log('Joining with code: ', this.joinCode);
                this.joinCode = '';
            },
            createGame: function() {
                console.log('Creating new game');
            }
        }
    }
</script>

<style scoped>

</style>