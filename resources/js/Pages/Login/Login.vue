<script setup>
 import {Link} from '@inertiajs/vue3';
</script>

<template>
    <div class="container">
        <h1>Login</h1>

        <div class="card p-lg-5 m-lg-3">
            <form class="container-md d-flex flex-column">
                <div class="input-group my-4">
                    <span class="input-group-text">E-mail</span>
                    <input 
                        type="email"
                        class="form-control"
                        aria-label="E-mail"
                        aria-describedby="inputGroup-email" 
                    />
                </div>

                <div class="input-group my-4">
                    <span class="input-group-text">Senha</span>
                    <input 
                        type="password"
                        class="form-control"
                        aria-label="Senha"
                        aria-describedby="inputGroup-password"
                    />
                </div>

                <button type="submit" class="btn btn-lg btn-primary my-4">Login</button>
            </form>
        </div>
        <Link to="/" class="text-center d-block">Retornar</Link>
    </div>
    
</template>

<style lang="scss" scoped>

.card{
    background-color: rgba(251, 253, 142, 0.751);

    .input-group{
        height: 7vh;

        span{
            min-width: 80px;
            width: 15%;
        }
    }
}
</style>