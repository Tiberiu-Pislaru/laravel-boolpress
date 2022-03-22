<template>
    <div>
        <h1>
            Ciao dalla pagina dei Contatti
        </h1>
        <form>
            <div class="form-row">
                <div class="col">
                <input type="text" v-model="formData.firstName" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                <input type="text" v-model="formData.lastName" class="form-control" placeholder="Last name">
                </div>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    data(){
        return{
            formData:{
                firstName:'',
                lastName:'',
            }
        }
    }
}
</script>

<style>

</style>