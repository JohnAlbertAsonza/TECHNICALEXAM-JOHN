<!DOCTYPE html>
<html>
<head>
	<title>Numeric To Text Converter</title>
</head>
<header>Numeric To Text Converter</header>
<body>
<form>
	<div>
		<label>Input:</label>
		<input type="number" name="input" id="input" placeholder="123.45" >
		<button type="button"  id="Convert" >Convert</button>
	</div>
	<div>
		<p id="output"></p>
	</div>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">


		  $("#Convert").click(function(){

		  	function numberToWordsMillion(number) {
			  const units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
			  const teens = ['eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
			  const tens = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
			  const thousands = ['', 'thousand', 'million'];

			  function convertChunk(num) {
			    if (num === 0) return '';
			    if (num < 10) return units[num];
			    if (num < 20) return teens[num - 11];

			    if ((units[num % 10])==0){
			     if (num < 100) return tens[Math.floor(num / 10)] + '' + units[num % 10] ;
			    }else{
			     if (num < 100) return tens[Math.floor(num / 10)] +'-' + units[num % 10] ;
			    }
			    
			    if (convertChunk(num % 100)<0){
			    if (num < 1000) return units[Math.floor(num / 100)] + ' hundred ' + convertChunk(num % 100);
				}else{
				if (num < 1000) return units[Math.floor(num / 100)] + ' hundred ' + convertChunk(num % 100);	
				}
			    return '';
			  }

			  if (number === 0) return 'zero';

			  let words = '';
			  let chunkIndex = 0;

			  while (number > 0) {
			    const chunk = number % 1000;
			    if (chunk !== 0) {
			      const chunkWords = convertChunk(chunk);
			      words = chunkWords + ' ' + thousands[chunkIndex] + ' ' + words;
			    }
			    number = Math.floor(number / 1000);
			    chunkIndex++;
			  }

			  return words.trim().toUpperCase();
			}




			var input=document.getElementById("input").value;
			var centavos=input%1;
			var numeric=input-centavos.toFixed(2);
			var replace=centavos.toFixed(2).toString().replace(".","");
			var cents="";
			if(replace>0){ 
			var cents=	" AND "+numberToWordsMillion(replace)+" CENTS";
			}
			
				console.log(input+": "+numberToWordsMillion(numeric)+cents);
			
			
		  });
	

</script>
</body>
</html>