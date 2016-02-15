<div class="row">
    <h2><strong>{who}</strong></h2>
    <div>
	<select name="players" onchange="location = this.options[this.selectedIndex].value;">
		<option selected disabled class="hideoption">{who}</option>
		<option value="1">{one}</option>
		<option value="2">{two}</option>
		<option value="3">{three}</option>
		<option value="4">{four}</option>
	</select>
        <p class="lead">{current_holds}</p>
        <table style="width:100%">
            <tr>
                <td style="text-decoration:underline;">Resource</td>
                <td style="text-decoration:underline;">Amount</td>
            </tr>
            <tr>
                <td>Gold</td> 
                <td>100</td>
            </tr>
            <tr>
                <td>Oil</td>
                <td>100</td>
            </tr>
            <tr>
                <td>Bonds</td>
                <td>100</td>
            </tr>
        </table>
        <p class="lead">{recent}</p><br/>
    </div>
</div>
