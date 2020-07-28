<template>
    <div class="container" style="padding-top: 20px">
        <v-btn @click="onBUttonClick">
            <v-icon>mdi-file</v-icon>
            Select File
        </v-btn>
        <v-text-field
                v-model="formData.displayFileName"
                readonly
        ></v-text-field>
        <input type="file" class="iffile" ref="fupload" @change="onFileChange">
        <div v-if="readyToUpload">
            <img :src="formData.uploadFileData" class="pre-img">
        </div>
        <v-btn v-if="readyToUpload" @click="uploadImage">
            <v-icon left>mdi-upload</v-icon>
            fayl yuklash
        </v-btn>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        computed:{
          readyToUpload(){
              return this.formData.displayFileName && this.formData.uploadFileData;
          }
        },
        data(){
            return{
                formData:{
                    displayFileName: null,
                    uploadFileData: null,
                    file: null
                }
            }
        },
        methods:{
            onFileChange(event){
                if (event.target.files && event.target.files.length){
                    let file = event.target.files[0];
                    this.formData.file = file;
                    this.formData.displayFileName = event.target.files[0].name + '('+this.calcSize( file.size )+'Kb)';

                    let reader = new FileReader();
                    reader.onload = e => {
                        this.formData.uploadFileData = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }

            },
            onBUttonClick(){
                this.$refs.fupload.click();
            },
            calcSize(size){
                return Math.round(size/1024)
            },
            uploadImage(){
                let data = new FormData();
                data.append('fupload',this.formData.file);

                axios.post(this.$store.state.backend_url +'/api/upload_file', data)
                    .then(response => {
                        console.log(response.data);
                    })
            }
        }
    }
</script>

<style>
    .iffile{
        display: none;
    }
    .pre-img{
        width: 250px;
        padding: 15px;
        border: 1px solid red;
        border-radius: 5px;
    }
</style>