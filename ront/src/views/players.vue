<template>
    <v-container  grid-list-md>
        <v-layout   row>
<!--            <v-col cols="12" md="8">-->
                <v-flex  xs12 sm10 md8 offset-sm1 offset-md-2>
                    <v-container>
                        <v-layout row>
                            <v-flex xs7 md8>
                                <v-text-field label="qiriqish" v-model="searchCart"></v-text-field>
                            </v-flex>
                            <v-flex xs3 md3>
                                <v-select label="positsiya" :items="poss" v-model="pos" multiple ></v-select>
                            </v-flex>
                            <v-flex xs2 md1>
                                <v-spacer></v-spacer>
                                <v-btn @click="create = !create" class="" fab dark color="indigo">
                                    <v-icon dark>mdi-plus</v-icon>
                                </v-btn>
                            </v-flex>

                        </v-layout>
                    </v-container>
                </v-flex>
<!--            filteredPlayers-->
                <v-flex v-for="player in players" :key="player.id" xs12 sm10 md8 offset-sm1 offset-md-2>
                    <v-card color="info" class="">
                        <v-container fluid>
                            <v-layout row>
                                <v-flex xs4 md3>
    <!--                                <img class="mx-2" :src="player.img" height="100px">-->
                                    <div>
                                    <v-img :elevation="15"  class="mx-2" :src="player.img" height="100px">
                                    </v-img>
                                        <div class="text-xs-center">
                                            <img  style="padding: 5px 0 0 5px; height: 35px"  src="img/youtube.png" >
                                        </div>
                                        <div class="hidden-md-and-up">
                                            <v-btn :elevation="10" style="background: red ;color: white;" flat>ko'rish</v-btn>
                                        </div>
                                    </div>
                                </v-flex>
                                <v-flex xs8 md9>
                                    <v-card-title class="pa-0">
                                        <div>
                                            <div>{{player.name}}</div>
                                            <div  style="font-size: 15px; font-family: italic">Yoshi: {{player.age}} Raqami: {{player.number}} Davlati: {{ player.country}}</div>
<!--                                            <div style="font-size: 15px; font-family: Icons">Positsiyasi: {{getPositsion(player.pos)}}</div>-->
                                            <v-divider class="white"></v-divider>
                                        </div>
                                        <v-spacer></v-spacer>
                                        <v-btn :elevation=15 @click="update = !update" class="" fab dark small color="success">
                                            <v-icon dark>mdi-pencil</v-icon>
                                        </v-btn>
                                    </v-card-title>
                                    <v-card-actions class="pa-0">
                                        <v-rating readonly dense half-increments color="red" v-model="player.rating"></v-rating>
                                        <div style="font-size: 15px" class="ml-1">
                                            <span>{{player.rating}}</span>
                                            <span>({{player.ratingCOunt}})</span>
                                        </div>
                                        <v-spacer></v-spacer>
                                        <v-btn :elevation=15 @click="del = !del" class="" fab dark small color="red">
                                            <v-icon dark>mdi-delete</v-icon>
                                        </v-btn>
                                    </v-card-actions>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card>
                </v-flex>
<!--            </v-col>-->
<!--                <v-col cols="6" md="4" class="text-right">-->
<!--                    <v-btn @click="form = !form" class="mx-2" fab dark color="indigo">-->
<!--                        <v-icon dark>mdi-plus</v-icon>-->
<!--                    </v-btn>-->
<!--                </v-col>-->

        </v-layout>
        <v-dialog
                v-model="create"
                max-width="490"
        >
            <v-card large>
                <v-card-title class="headline">O`yinchi qo`shish</v-card-title>

<!--                <v-card-text>-->
<!--                    Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.-->
<!--                </v-card-text>-->
                <v-col class="input">
                    <v-text-field
                            label="Nomi"
                            outlined
                    ></v-text-field>
                </v-col >
                <v-col class="input">
                    <v-text-field
                            label="Yoshi"
                            outlined
                    ></v-text-field>
                </v-col >
                <v-col class="input">
                    <v-text-field
                            label="Raqami"
                            outlined
                    ></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field
                            label="reytingi"
                            outlined
                    ></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field
                            label="Youtubeadres"
                            outlined
                    ></v-text-field>
                </v-col>

                <v-file-input class="input" multiple ></v-file-input>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                            color="success"
                            @click="create = false"
                    >
                        Saqlash
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                create: false,
                searchCart: null,
                // pos: [],
                // poss: ['ss','cf','rfs','amf','cmf'],

                players:[]
            }
        },
        methods:{
            // getPositsion(pos){
            //     return pos.join('/')
            // },
            getList() {
                axios.get('http://lava.loc/api/futball')
                    .then(res => {
                        this.players = res.data
                        console.log(this.players);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.getList();
        },
        computed:{
            filteredPlayers(){
                let players = this.players
                if(this.searchCart)
                    players = players.filter(p =>
                        p.search.toLowerCase().indexOf(this.searchCart.toLowerCase()) >=0)
                    // &&  p.number.toLowerCase().indexOf(this.searchCart.toLowerCase()) >=0)
                // if (this.pos.lenght)
                //     players = players.filter(b => this.pos.filter(val=>b.pos.indexOf(val)!==-1).length>0)

                return players;
            }
        },

    }
</script>

<style scoped>
 .input{
     padding: 0 10px 0 10px !important;
     margin: 0px !important;
 }
</style>