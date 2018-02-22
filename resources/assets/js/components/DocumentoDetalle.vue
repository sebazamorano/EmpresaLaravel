<template>
    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(detalle, index) in detalles">
                <td>{{ detalle.nombre }}</td>
                <td>{{ detalle.cantidad }}</td>
                <td>{{ detalle.valor | moneda}}</td>
                <td>
                    <button class="btn btn-danger" @click="borrar(index)">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>{{ Suma | moneda }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>IVA</td>
                <td>{{ IVA | moneda }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Total</td>
                <td>{{ Total | moneda }}</td>
                <td></td>
            </tr>

            </tfoot>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['detalles'],
        methods:{
            borrar: function (index) {
                this.$delete(this.detalles, index);
            }
        },
        computed: {
            Suma: function () {
                return _.sumBy(this.detalles, 'valor');
            },
            IVA: function () {
                return this.Suma * 0.19;
            },
            Total: function () {
                return this.Suma + this.IVA;
            }
        },
        filters: {
            moneda: function (value) {
                return numeral(value).format('$ 0.0,0');
            }
        }
    }
</script>