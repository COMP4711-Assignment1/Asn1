<div class="row">
    <h1>{name}</h1>
    <p>Current price: {price}</p>
    <div style="display:inline-block">
        <select onchange="location = this.options[this.selectedIndex].value;">
            <option selected disabled class="hideoption">{name}</option>
            {stocks}
            <option value="{code}">{name}</option>
            {/stocks}
        </select>
    </div>

    <table class="inline">
        {transactions}
        <tr>
            <td>
                Sequence: {seq}
            </td>
            <td>
                Date/Time: {datetime}
            </td>
            <td>
                Code: {code}
            </td>
            <td>
                Action: {action}
            </td>
            <td>
                Amount: {amount}
            </td>
        </tr>
        {/transactions}
    </table>
</div>