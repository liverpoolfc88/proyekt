
<template>
    <div class="about">
        <v-row class="justify-end">
            <v-col cols="2" class="justify-end">
                <v-switch
                        v-model="$vuetify.theme.dark"
                        hide-details
                        inset
                        label="Theme Dark"
                ></v-switch>
            </v-col>
        </v-row>
        <h1 style="text-align: center">This is an Do'stlar page</h1>
        <v-data-table
                :headers="headers"
                :items="friends"
                :items-per-page="3"
                class="container elevation-1"
        ></v-data-table>

    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                friends: [],
                headers: [
                    {
                        text: "tr",
                        value: 'id'
                    },
                    {
                    text: "Nomi",
                    value: "name"
                },
                    {
                        text: "Manzil",
                        value: 'adres'
                    }]
            }
        },
        methods: {
            getList() {
                axios.get('http://lava.loc/api/dost')
                    .then(res => {
                        this.friends = res.data
                        // console.log(res.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.getList();
        }
    }
</script>