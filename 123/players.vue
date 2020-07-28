<template>
    <v-container grid-list-md>
        <v-layout row>
            <!--            <v-col cols="12" md="8">-->
            <v-flex xs12 sm10 md8 offset-sm1 offset-md-2>
                <v-container>
                    <v-layout row>
                        <v-flex xs7 md8>
                            <v-text-field label="qiriqish" v-model="searchCart"></v-text-field>
                        </v-flex>
                        <v-flex xs3 md3>
<!--                            <v-select label="positsiya" :items="poss" v-model="pos" multiple></v-select>-->
                        </v-flex>
                        <v-flex xs2 md1>
                            <v-spacer></v-spacer>
                            <v-btn @click="newPlayer()" class="" fab dark color="indigo">
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
<!--                                    <v-img :elevation="15" class="mx-2" :src="player.img" height="100px">-->
                                    <v-img v-if="player.img" :elevation="15" class="mx-2" :src="player.img" height="100px">
                                    </v-img>
                                    <div class="text-xs-center">
                                        <img style="padding: 5px 0 0 5px; height: 35px" src="img/youtube.png">
                                    </div>
                                    <div class="hidden-md-and-up">
                                        <v-btn :elevation="10" style="background: red ;color: white;">ko'rish
                                        </v-btn>
                                    </div>
                                </div>
                            </v-flex>
                            <v-flex xs8 md9>
                                <v-card-title class="pa-0">
                                    <div>
                                        <div>{{player.name}}</div>
                                        <div style="font-size: 15px; font-family: italic">Yoshi: {{player.age}} Raqami:
                                            {{player.number}} Davlati: {{ player.country}}
                                        </div>
                                        <!--                                            <div style="font-size: 15px; font-family: Icons">Positsiyasi: {{getPositsion(player.pos)}}</div>-->
                                        <v-divider class="white"></v-divider>
                                    </div>
                                    <v-spacer></v-spacer>
                                    <v-btn :elevation=15 @click="editPlayer(player)" class="" fab dark small
                                           color="success">
                                        <v-icon dark>mdi-pencil</v-icon>
                                    </v-btn>
                                </v-card-title>
                                <v-card-actions class="pa-0">
                                    <v-rating readonly dense half-increments color="red"
                                              v-model="player.rating"></v-rating>
                                    <div style="font-size: 15px" class="ml-1">
                                        <span>{{player.rating}}</span>
                                        <span>({{player.ratingCOunt}})</span>
                                    </div>
                                    <v-spacer></v-spacer>
                                    <v-btn :elevation=15 @click="deletePlayer(player.id)" class="" fab dark small color="red">
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
                <v-card-title class="headline">
                   {{ dialogHeaderText }}
                    <v-spacer></v-spacer>
                    <v-btn icon>
                        <v-icon @click="create = false">mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <!--                <v-card-text>-->
                <!--                    Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.-->
                <!--                </v-card-text>-->
                <v-col class="input">
                    <v-text-field v-model="form.name" dense label="Nomi" type="text" outlined></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field v-model="form.age" dense label="Yoshi" type="number" outlined></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field v-model="form.number" dense label="Raqami" type="number" outlined></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field v-model="form.rating" dense label="reytingi" type="number" outlined></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field v-model="form.youtube_link" dense label="Youtubeadres" type="text" outlined></v-text-field>
                </v-col>
                <v-col class="input">
                    <v-text-field v-model="form.country" dense label="Country" type="text" outlined></v-text-field>
                </v-col>
                <v-file-input v-model="form.file" class="input"></v-file-input>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="success" @click="save()">Saqlash</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
    import axios from 'axios';
    import Swal from "sweetalert2";

    export default {
        data() {
            return {
                create: false,
                searchCart: null,
                // pos: [],
                // poss: ['ss','cf','rfs','amf','cmf'],

                players: [],
                form: [],
                dialogHeaderText: '',
                formData: [],
            }
        },
        methods: {
            // getPositsion(pos){
            //     return pos.join('/')
            // },
            getList() {
                axios.get(this.$store.state.backend_url + '/api/futball')
                    .then(res => {
                        this.players = res.data
                        console.log(this.players);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            newPlayer() {
                this.dialogHeaderText = "O'yinchi qo'shish";
                this.form = {
                    id: Date.now(),
                    name: "",
                    country: "",
                    age: "",
                    number:"",
                    youtube_link:"",
                    rating:""
                };
                this.create = true;
                // this.editMode = false;
                // if (this.$refs.dialogForm) this.$refs.dialogForm.reset();
            },
            editPlayer(item) {
                this.dialogHeaderText = "O'yinchi o'zgartirish";
                this.form = Object.assign({}, item);
                this.create = true;
                // this.editMode = false;
                // if (this.$refs.dialogForm) this.$refs.dialogForm.reset();
            },
            save() {
                this.formData.append("files[]", this.form.file);
                console.log(this.formData);
                axios.post(this.$store.state.backend_url + "/api/update_player", this.form)
                    .then(res => {
                        const obj_id = res.data;
                        axios
                            .post(
                                this.$store.state.backend_url +
                                "/api/player/update-files/" +
                                obj_id,
                                this.formData,
                                {
                                    headers: {
                                        "Content-Type": "multipart/form-data"
                                    }
                                }
                            )
                            .then(resp => {
                                console.log(resp);
                                // this.loading = false;
                                // this.$router.push("/documents/list");
                            })
                            .catch(err => {
                                console.error(err);
                                // this.loading = false;
                            });
                        this.getList();
                        this.create = false;
                        console.log(res);
                    }).catch(err => {
                        console.error(err);
                })
               // console.log(this.form);
            },
            deletePlayer(id){
                Swal.fire({
                    title: 'O`chirishni xoxlaysizmi?',
                    text: 'You will not be able to recover this imaginary file!'+id,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'blue',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(this.$store.state.backend_url + '/api/futball_delete/'+id)
                            .then(res => {
                                Swal.fire(
                                    'Deleted!',
                                    res.date,
                                    'success'
                                )
                                this.getList();
                            })
                            .catch(err => {
                                console.error(err);
                            });
                        // For more information about handling dismissals please visit
                        // https://sweetalert2.github.io/#handling-dismissals
                    }
                    // else if (result.dismiss === Swal.DismissReason.cancel) {
                    //     Swal.fire(
                    //         'Cancelled',
                    //         'Your imaginary file is safe :)',
                    //         'error'
                    //     )
                    // }
                })
            }
        },
        mounted() {
            this.getList();
            this.formData = new FormData();
        },
        computed: {
            filteredPlayers() {
                let players = this.players
                if (this.searchCart)
                    players = players.filter(p =>
                        p.search.toLowerCase().indexOf(this.player.name.toLowerCase()) >= 0)
                // &&  p.number.toLowerCase().indexOf(this.searchCart.toLowerCase()) >=0)
                // if (this.pos.lenght)
                //     players = players.filter(b => this.pos.filter(val=>b.pos.indexOf(val)!==-1).length>0)

                return players;
            }
        },

    }
</script>

<style scoped>
    .input {
        padding: 0 10px 0 10px !important;
        margin: 0px !important;
    }
</style>