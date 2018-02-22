@extends('layouts.app')

@section('content')
<div class="container" id="task">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <input type="text" class="form-control" v-model="nombre">
                    <button class="btn btn-success" @click="add">Guardar</button>
                    <ul>
                        <li v-for="nombre in aNombres">
                            @{{ nombre }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="https://vuejs.org/js/vue.js"></script>-->
<script>
    /*let app = new Vue({
        el: "#task",
        data () {
            return {
                nombre: '',
                aNombres:[]
            }
        },

        methods: {
            add: function () {
                this.aNombres.push(this.nombre);
                this.nombre = '';
            }
        },

        filters: {
            uppercase: function (value) {
                return value.toUpperCase()
            }
        }
    });*/
</script>
@endsection
