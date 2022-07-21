<script setup>
import Alloggiato from "../components/Modulo/Alloggiato.vue"
import Persone from "../components/Modulo/Persone.vue"
</script>

<template>
    <div class="wrapper">
        <div class="alert alert-info" role="alert">
            <div>
                La preghiamo di voler gentilmente compilare il seguente modulo, indicando i Suoi
                dati e quelli di tutte le persone/componenti della famiglia/gruppo che alloggeranno
                con Lei durante il soggiorno.
            </div>
        </div>
        <form :submit="onSubmit" :validated="validated" novalidate="novalidate">
            <Alloggiato />
            <Persone />

            <div role="group" aria-labelledby="privacy1_lbl" class="b-form-group form-group">
                <label id="privacy1_lbl" for="privacy1" class="col-form-label">Privacy</label>
                <form name="privacy1" value="1" required="required">
                    <p>Ho letto l'informativa sulla privacy</p>
                    <a href="{$rewrite('privacy')}" target="_blank">Informativa sulla privacy</a>
                </form>
                <p>
                    Ai sensi degli articoli 13 e 6 del Regolamento UE 2016/679 dichiaro di aver
                    preso visione dell’informativa per il trattamento dei dati personali.
                </p>
            </div>

            <div id="msgAvviso" class="alert alert-danger d-none">
                <div>Dati non compilati correttamente</div>
            </div>

            <div class="text-center">
                <b-button type="submit" variant="primary">Avanti &gt;&gt;</b-button>
            </div>
        </form>
    </div>
</template>

<style scopes lang="scss">
div.wrapper {
    background-color: white;
    height: calc(100vh - 71px);
}
</style>
