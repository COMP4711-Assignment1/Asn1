<div class="row">
    <h1>{name}</h1>
    <p class="lead">{what}</p><br/>
    <select onchange="location = this.options[this.selectedIndex].value;">
        <option selected disabled class="hideoption">{name}</option>
        {stocks}
        <option value="{code}">{name}</option>
        {/stocks}
    </select>
</div>