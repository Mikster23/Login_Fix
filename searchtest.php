<input id="my-input" />

<script>
var aCleanData = ['aaa','aab','faa','fff','ffb','fgh','mmm','maa'];

$('#my-input').autocomplete({
    source: aCleanData,
    minLength: 2,
    search: function(oEvent, oUi) {
        // get current input value
        var sValue = $(oEvent.target).val();
        // init new search array
        var aSearch = [];
        // for each element in the main array ...
        $(aCleanData).each(function(iIndex, sElement) {
            // ... if element starts with input value
            if (sElement.substr(0, sValue.length) == sValue) {
                // add element
                aSearch.push(sElement);
            }
        });
        // change search array
        $(this).autocomplete('option', 'source', aSearch);
    }
});
</script>
