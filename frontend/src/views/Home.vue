
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
    <v-icon class="mx-12">mdi-arrow-up-bold-box</v-icon>
    <v-data-table
            :headers="headers"
            :items="friends"
            :items-per-page="3"
            class="container elevation-1"
    >
      <template v-slot:item.action="{ item }">
        <v-icon @click="edit(item.id)">mdi-pencil</v-icon>
        <v-icon @click="dialog = !dialog">mdi-delete</v-icon>
      </template>
    </v-data-table>

    <v-dialog v-model="dialog" persistent max-width="290">
      <v-card>
        <v-card-title class="headline">Use Google's location service?</v-card-title>
        <v-card-text>Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dialog = false">Disagree</v-btn>
          <v-btn color="green darken-1" text @click="dialog = false">Agree</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  import axios from 'axios'
  export default {
    data() {
      return {
        dialog: false,
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
          },
          {
            text: "",
            value: 'action'
          }]
      }
    },
    methods: {
      edit(id){
        alert(id);
      },
      getList() {
        axios.get('http://laravel.loc/api/dost')
                .then(res => {
                  this.friends = res.data
                  console.log(res.data);
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