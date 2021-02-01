ddwed<template>
    <main>
        <div class="container">
            <div class="col-md-12">
                <h2>BodyTech | Formulario web ferreteria nuevo milenio</h2>
                <br><br>
                <a href="clients/create" class="btn btn-outline-primary">Crear cliente</a>
            </div>
            <br><br>
            <h4>Listado de clientes API:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Tipo de Identificación</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Ocupación</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="clients" v-for="client in clients">
                        <td>{{client.names}} </td>
                        <td>{{client.identification_type}}</td>
                        <td>{{client.identification}}</td>
                        <td>{{client.address}}</td>
                        <td>{{client.phone}}</td>
                        <td>{{client.email}}</td>
                        <td>{{client.position}}</td>
                        <td>{{client.department_name}}</td>
                        <td>{{client.municipality_name}}</td>
                        <td>
                            <a :href="'clients/'+client.id+'/edit'" class="btn btn-outline-primary">Modificar</a>
                            <button @click="deleteclient(client.id)" type="submit" class="btn btn-outline-danger">Eliminar&nbsp;&nbsp;</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>
<script>
export default {
    components: {},
    data: () => ({
        clients: [],
    }),
    methods: {
        getclients() {
            axios.get("/api/clients-list/").then(response => {
                console.log(response.data);
                this.clients = response.data;
            });
        },
         deleteclient(client_id) {
             if(confirm("Esta seguro de eliminar este regsitro?")){
                console.log(client_id);
                axios.get("/api/destroy/"+client_id).then(response => {
                    console.log(response.data);
                    location.reload();
                })
                .catch(function(error) {
                    alert("Ha ocurrido un error.");
                });
            }
        }
    },
    created() {
        this.getclients();
    }
};
</script>
