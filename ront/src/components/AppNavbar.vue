<template>
    <nav>
        <v-navigation-drawer v-model="drawer" dark="" app class="blue">
            <v-layout column align-center>
                <v-flex class="mt-10 mb-8">
                    <v-avatar>
                        <v-icon large>mdi-home-circle</v-icon>
                    </v-avatar>
                </v-flex>
            </v-layout>
            <v-list>
                <v-list-item v-for="link in links" :key="link.text" router :to="link.route" active-class="border">
                    <v-list-item-action>
                        <v-icon>{{ link.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>{{ link.text }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-flex class="ma-2">
                <template>
                    <v-carousel
                    cycle
                    dark
                    height="230"
                    hide-delimiter-background
                    show-arrows-on-hover
                    >
                        <v-carousel-item v-for="(slide,i) in slides" :key="i">
                            <v-sheet
                            color="white"
                            height="80%"
                            align="center"
                            tile>
                                <v-row class="fill-height" align="center" justify="center">
                                    <div class="grey--text">
                                        <h4>BU CARUSEL</h4>
                                        <p class="ma-2">{{ slide }}</p>
                                        <v-btn outlined color="indigo">KOproq oqish</v-btn>
                                    </div>
                                </v-row>
                            </v-sheet>
                        </v-carousel-item>

                    </v-carousel>
                </template>
            </v-flex>
        </v-navigation-drawer>
    </nav>
</template>

<script>
    export default {
        data:()=>({
            drawer: true,
            links:[
                {
                icon: 'mdi-alarm-light-outline',
                text: 'alarm-light-outline',
                route: '/'
                },
                {
                    icon: 'mdi-air-horn',
                    text: 'air-horn',
                    route: '/'
                },
                {
                    icon: 'mdi-airplane',
                    text: 'airplane',
                    route: '/'
                },
                {
                    icon: 'mdi-air-conditioner',
                    text: 'air-conditioner',
                    route: '/'
                }
            ],
            slides: [
                'Assalomu alaykum!',
                'Xamma yaxshimi!',
                'Menxam yaxshi!',
                'Sizlarda nima gap?',
            ]
        })
    }
</script>
<style scoped>
    .border{
        border-left: 4px solid #2C3E50 !important;
    }
</style>