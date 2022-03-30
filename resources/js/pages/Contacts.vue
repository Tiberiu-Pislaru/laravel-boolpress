<template>
    <div>
        <h1>
            Ciao dalla pagina dei Contatti
        </h1>
        <div v-if="!formSubmitted">
            <div class="form-row">
                <div class="col">
                    <validation-provider rules="required" v-slot='{ errors }'>
                        <input type="text" name="firstname" v-model="formData.firstname" class="form-control" placeholder="First name">
                        <span class="text-danger">{{ errors[0] }}</span>
                    </validation-provider>
                </div>
                <div class="col">
                    <input type="text" name="lastname" v-model="formData.lastname" class="form-control" placeholder="Last name">
                </div>
                <button type="submit" class="btn btn-primary" @click="submitForm" >Invia Form</button>
            </div>
        </div>

        <div v-else class="alert alert-success py-5"> 
            well done
        </div>

    </div>
</template>

<script>
import axios from  'axios';
import { ValidationProvider } from 'vee-validate';
export default {
    components:{
        ValidationProvider
    },
    data(){
        return{
            formSubmitted:false,
            formData:{
                firstname:'',
                lastname:'',
            },
        }
    },
    methods:{
        async submitForm(){
            try{

                // let formDataInstance = new FormData();
                // formDataInstance.append('firstname', this.formData.firstname);
                // formDataInstance.append('lastname', this.formData.lastname);    

                let result = await axios.post('/api/contacts', this.formData);

            }catch(er){
                console.log(er);
                alert('Non siamo riusciti a inviare la sua richiesta\n'+ er.response.data.message);
            }
        },
    },
}
</script>

<style>

</style>