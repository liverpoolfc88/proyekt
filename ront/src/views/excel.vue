<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <label>File
                <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </label>
            <button v-on:click="submitFile()">Submit</button>
        </div>
    </div>
</template>



<script>
    import axios from 'axios';
    export default {
        /*
          Defines the data used by the component
        */
        data(){
            return {
                file: '',
                tableData: ''
            }
        },

        methods: {
            /*
              Submits the file to the server
            */
            getList() {
                axios.get(this.$store.state.backend_url + '/api/data')
                    .then(res => {
                        this.data = res.data
                        console.log(this.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            submitFile(){
                /*
                        Initialize the form data
                    */
                let formData = new FormData();

                /*
                    Add the form data we need to submit
                */
                formData.append('file', this.file);

                /*
                  Make the request to the POST /single-file URL
                */
                axios.post( this.$store.state.backend_url +'/api/upload',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(res){
                    this.tableData = res.data;

                    console.log(res);
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                    });
            },

            /*
              Handles a change on the file upload
            */
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            }
        },
        
        mounted() {
            this.getList();
        },
    }
</script>