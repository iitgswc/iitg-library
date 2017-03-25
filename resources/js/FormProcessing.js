//<![CDATA[
function limittoFullText(myForm) {
     if (myForm.fulltext_checkbox.checked) myForm.clv0.value = "Y";
     else myForm.clv0.value = "N";
}function limittoScholarly(myForm) {
     if(myForm.scholarly_checkbox.checked) myForm.clv1.value = "Y";
     else myForm.clv1.value = "N";
}function limittoCatalog(myForm) {
     if(myForm.catalog_only_checkbox.checked) myForm.clv2.value = "Y";
     else myForm.clv2.value = "N";
}function limittoIR(myForm) {
     if(myForm.IR_only_checkbox.checked) myForm.clv3.value = "Y";
     else myForm.clv3.value = "N";
}function ebscoPreProcess(myForm) {
     myForm.bquery.value = myForm.search_prefix.value + myForm.uquery.value;
}function limittoArticles(myForm) {
     myForm.bquery.value += ' AND (ZT Article OR PT *article*)';
}function limittoBooks(myForm) {
     myForm.bquery.value += ' AND PT Book';
}//]]>