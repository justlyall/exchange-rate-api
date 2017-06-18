var VueStateHelper = {
    resetVariablesAndShowSuccessMessage: function() {
        this.showQuotation = false;
        this.showSuccessMessage = true;
        this.selectedCurrency = 0;
        this.dollarAmount = 0;
        this.foreignCurrencyAmount = 0;
        setTimeout((function () {
            this.showSuccessMessage = false
        }).bind(this), 4000);
    },
    setVariablesForQuotation: function() {
        this.showQuotation = true;
        var currencyToPurchase = this.currencies[this.selectedCurrency];
        this.quotation.surcharge_amount = (currencyToPurchase.surcharge_percent * this.dollarAmount / 100).toFixed(2);
        this.quotation.discount_amount = currencyToPurchase.code === 'EUR'
            ? (this.dollarAmount * (this.euro_dicount_percentage / 100)).toFixed(2)
            : 0;
        this.quotation.total = (
            parseFloat(this.dollarAmount) +
            parseFloat(this.quotation.surcharge_amount) -
            parseFloat(this.quotation.discount_amount)
        ).toFixed(2);
    }
};