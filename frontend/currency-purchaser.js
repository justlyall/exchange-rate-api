var app = new Vue({
    el: '#currency-app',
    data: {
        currencies:[{code:'Loading'}],
        selectedCurrency: 0,
        foreignCurrencyAmount: 0,
        dollarAmount: 0,
        showQuotation: 0,
        showSuccessMessage: false,
        quotation: {},
        euro_dicount_percentage: 2
    },
    mounted: function() {
        axios.get('../server/public/api/v1/currencies').then((function(responce) {
            this.currencies = responce.data.currencies;
            this.euro_dicount_percentage = responce.data.currency_discount

        }).bind(this));
    },
    methods: {
        updateDollarAmount: function() {
            this.dollarAmount = (this.foreignCurrencyAmount / this.currencies[this.selectedCurrency].rate).toFixed(2);
        },
        updateForeignCurrencyAmount: function () {
            this.foreignCurrencyAmount = (this.dollarAmount * this.currencies[this.selectedCurrency].rate).toFixed(2);
        },
        showPurchaseScreen: function() {
            this.showQuotation = false;
        },
        showQuotationPage: function () {
            if (this.dollarAmount == 0) {
                alert('Please enter amount of foreign currency to purchase');
                return false;
            }
            VueStateHelper.setVariablesForQuotation.call(this);
        },
        purchase: function() {
            axios.post('../server/public/api/v1/purchase', {
                amount: this.foreignCurrencyAmount,
                currencyCode: this.currencies[this.selectedCurrency].code
            }).then((function() {
                VueStateHelper.resetVariablesAndShowSuccessMessage.call(this);
            }).bind(this));
        }
    }
});