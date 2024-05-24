<!doctype html>
<HTML>
<HEAD>
<TITLE>Convert HTML to multi-page Pdf</TITLE>
<style>
    body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
	margin: 0 auto;
	line-height: 30px;
	max-width: 800px;
}

.heading {
	color: #211a1a;
	font-weight: bold;
	font-size: x-large;
	white-space: nowrap;
	margin: 20px auto;
	text-align: center;
}

#html-template {
	text-align: center;
	margin: 30px 0px 60px 0px; 
}

#html-template1 {
	background: #ffffff;
	padding: 20px;
	border: #E0E0E0 1px solid;
	border-radius: 3px;
}

#container {
	margin: 30px;
}

.btn-convert {
	padding: 10px 20px;
    border-radius: 20px;
    margin: 10px 0px;
    display: inline-block;
    cursor: pointer;
    color: #211c1c;
    background-color: #28a745;
    border: #23943d 1px solid;
}

a {
	color: #007bff;
}

.link-container {
	text-align: right;
}

#html-template2 {
	margin: 30px 0px 60px 0px; 
	padding: 20px;
	border: #E0E0E0 1px solid;
	border-radius: 3px;	
}

#convertion-type {
	border: #1d1d1d 1px solid;
    border-radius: 20px;
    PADDING: 8px 20px;
    margin-right: 15px;
}

.description {
	text-align: justify;
}
</style>
</HEAD>
<BODY>
	<div id="container">
		<div class="link-container">
			<select id="convertion-type">
    			<option value="split">Split HTML to Multi-Page PDF</option>
    			<option value="">Add HTML to PDF Page</option>
			</select>
			<button class="btn-convert">Convert
				HTML to PDF</button>
		</div>
		<div class="single-html-block">
			<div id="html-template">
            <h1>Welcome to visit our event portal</h1>
<img class="banner" src="event-banner.jpeg" width="100%" height="400px" />
<p class="description">Donec id leo quis felis vehicula bibendum sit amet ut tellus. Sed
	sagittis aliquet rhoncus. Pellentesque vulputate nunc ultricies,
	egestas augue ac, ullamcorper dui. Etiam diam mauris, molestie in purus
	a, venenatis pretium leo. Sed id metus eleifend, scelerisque neque id,
	posuere arcu. Nunc cursus et dui quis fringilla. In in turpis feugiat
	diam porttitor tempus. In hendrerit diam dolor, id pellentesque ante
	volutpat a. Nam tortor sapien, semper ut justo et, accumsan imperdiet
	sem. Sed euismod nunc vitae dolor porttitor ullamcorper. Donec sed
	lacinia dui. Nunc sed suscipit erat. Phasellus euismod ultrices velit,
	hendrerit tempor diam elementum ut.
</p>
			</div>

			<div id="html-template1">
			<div class="event-detail">
	<h1>Thank you for registering with us.</h1>
	<h2>This is the acknowledgement of your registeration for attending the
		event.</h2>
	<p class="row">
		Event Name:<br />Machine learning introduction for kids
	</p>
	<p class="row">
		Event Date:<br />27 May 2021
	</p>
	<p class="row">
		Time:<br />10:30 AM
	</p>
	<p class="row">
		Venue:<br />AMC Graduate Center,<br>25, AMC Street,<br>New York, USA.
	</p>
	<p class="pdf-content">
		Contact our <a href="#">Organizers' Team</a> if you need any support.
	</p>
</div>
			</div>

			<div id="html-template2">
            <h2>Contact Us</h2>
                <p>
                    T2, Ruth Isabel Villa<br /> 12, RGT Street,<br /> New york.
                </p>

                <h2>Contact Numbers</h2>
                <p>
                    Phone: 8909878.<br /> Fax: 678965.<br /> Mobile: 9878978.
                </p>
			</div>

		</div>
	</div>
</BODY>
<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
    $(document).ready(function(){
	$(".btn-convert").click(function(){
		var convertionType = $("#convertion-type").val();
		if(convertionType == "split") {
			splitHTMLtoMultiPagePDF();
		} else {
			addHTMLToPDFPage();
		}
	});
});

function addHTMLToPDFPage() {

	var doc = new jsPDF('p', 'pt', [$("body").width(), $("body").height()]);
	
	converHTMLToCanvas($("#html-template")[0], doc, false, false);
	
	converHTMLToCanvas($("#html-template1")[0], doc, true, false);
	
	converHTMLToCanvas($("#html-template2")[0], doc, true, true);
}

function converHTMLToCanvas(element, jspdf, enableAddPage, enableSave) {
	html2canvas(element, { allowTaint: true }).then(function(canvas) {
		if(enableAddPage == true) {
			jspdf.addPage($("body").width(), $("body").height());
		}
		
		image = canvas.toDataURL('image/png', 1.0);
		jspdf.addImage(image, 'PNG', 15, 15, $(element).width(), $(element).height()); // A4 sizes
		
		if(enableSave == true) {
			jspdf.save("add-to-multi-page.pdf");
		}
	});
}

function splitHTMLtoMultiPagePDF() {
	var htmlWidth = $(".single-html-block").width();
	var htmlHeight = $(".single-html-block").height();
	var pdfWidth = htmlWidth + (15 * 2);
	var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
	
	var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);

	var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;


	html2canvas($(".single-html-block")[0], { allowTaint: true }).then(function(canvas) {
		canvas.getContext('2d');

		var image = canvas.toDataURL("image/png", 1.0);
		doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);


		for (var i = 1; i <= pageCount; i++) {
			doc.addPage(pdfWidth, pdfHeight);
			doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
		}

		doc.save("split-to-multi-page.pdf");
	});
};
</script>
</HTML>