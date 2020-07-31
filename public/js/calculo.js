const calculo = {
    template: `
    <div class="form-group row justify-content-md-center">
        <div class="col-md-3">
            <label for="cantidad">Cantidad<span class="text-danger">*</span></label>
            <input type="text" id="cantidad" class="form-control" name="cantidad" v-model="cantidadRecurso">
        </div>
        <div class="col-md-4">
            <label for="precio_unitario">Precio Unitario<span class="text-danger">*</span></label>
            <input type="number" id="precio_unitario" class="form-control" name="precio_unitario" v-model="precioUnitario">
        </div>
        <div class="col-md-4">
            <label for="monto_total">Monto Total<span class="text-danger">*</span></label>
            <input type="number" id="monto_total" class="form-control" name="monto_total" v-model="totalAmount" readonly>
        </div>
    </div>
  `,
    data() {
        return {
            cantidadRecurso: 1,
            precioUnitario: 1,
        };
    },
    computed: {
        totalAmount() {
            let total = 0;
            total = this.cantidadRecurso * this.precioUnitario;
            return total;
        },
    },
};

export default calculo;
