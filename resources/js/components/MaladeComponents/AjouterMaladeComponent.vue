<template>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title" >Ajout d'un malade</h2>

                    <div
                        v-if="errors !== ''"
                    >
                        <p class="text-danger">
                            {{ errors }}
                        </p>
                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Nom</label>
                                <input v-model="nom" type="text" class="form-control"  placeholder="Nom">
                                <div
                                    v-if="nomErrors !== ''"
                                >
                                    <p class="text-danger">
                                        {{ nomErrors }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Prenom</label>
                                <input v-model="prenom"  type="text" class="form-control"  placeholder="Prenom">
                                <div
                                    v-if="prenomErrors !== ''"
                                >
                                    <p class="text-danger">
                                        {{ prenomErrors }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Mobile</label>
                            <input v-model="mobile"  type="text" class="form-control"  placeholder="05 42 48 76 63">
                            <div
                                v-if="mobileErrors !== ''"
                            >
                                <p class="text-danger">
                                    {{ mobileErrors }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Address </label>
                            <input v-model="address"  type="text" class="form-control" placeholder="Ville , willaya , pays ">
                            <div
                                v-if="addressErrors !== ''"
                            >
                                <p class="text-danger">
                                    {{ addressErrors }}
                                </p>
                            </div>
                        </div>
                    <div class="form-group">
                        <label >Age </label>
                        <input v-model="age"  type="text" class="form-control"  placeholder="Age du patient">
                        <div
                            v-if="ageErrors !== ''"
                        >
                            <p class="text-danger">
                                {{ ageErrors }}
                            </p>
                        </div>
                    </div>


                        <button @click="ajouterPersonne" class="btn btn-primary">Ajouter un Malade</button>

                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            age:"",
            nom: "",
            prenom: "",
            address: "",
            mobile: "",
            nomErrors: "",
            prenomErrors: "",
            addressErrors: "",
            mobileErrors: "",
            ageErrors:"",
            errors:"",

        };
    },
    methods: {
        ajouterPersonne(){
            this.nomErrors= "";
            this.ageErrors= "";
            this.errors="",
             this.prenomErrors= "";
                this.addressErrors= "";
                this.mobileErrors= "";
            var formData = new FormData();
            formData.append('nom',this.nom)
            formData.append('age',this.age)

            formData.append('prenom',this.prenom)
            formData.append('address',this.address)
            formData.append('mobile',this.mobile)

            axios.post('/ajouter_malade',formData,{
                headers: {"Content-Type": "multipart/form-data"}
            }).then((res)=>{
                if(res.data.status == 0){
                    this.errors= "Le malade exisite deja avec se numéro de telephone";
                    Swal.fire({
                        icon: 'error',
                        title: 'Malade exisite deja vec se numéro de telephone'
                    })
                }
                else{
                    this.nomErrors= "";
                    this.errors= "";
                    this.ageErrors= "";
                    this.prenomErrors= "";
                    this.addressErrors= "";
                    this.mobileErrors= "";
                    Swal.fire({
                        icon: 'success',
                        title: 'Malade ajouter correctement'
                    })
            }
            }).catch((error) => {
                if (error.response.data.errors.age) {
                    this.ageErrors = error.response.data.errors.age[0];
                }
                if (error.response.data.errors.nom) {
                    this.nomErrors = error.response.data.errors.nom[0];
                }

                if (error.response.data.errors.address) {
                    this.addressErrors = error.response.data.errors.address[0];
                }
                if (error.response.data.errors.mobile) {
                    this.mobileErrors = error.response.data.errors.mobile[0];
                }
                if (error.response.data.errors.prenom) {
                    this.prenomErrors = error.response.data.errors.prenom[0];
                }
            })
        }
    }
}
</script>
