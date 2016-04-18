<div class="row">
    <h2><strong>{username}</strong></h2>
    <div>
        <table style="display:inline-block;">
            <tr>
                <td>
                    <select onchange="location = this.options[this.selectedIndex].text;">
                        <option selected disabled class="hideoption">{username}</option>
                            {players}
                            <option value="{id}">{username}</option>
                            {/players}
                        </select>
                </td>
            </tr>
        </table>

        <table class="inline">
            {owned}
            <tr>
                <td>
                    Stock: {stockCode}
                </td>
                <td>
                    Certificate: {certificate}
                </td>
                <td>
                    Amount: {amount}
                </td>
                <td>
                    Time: {time}
                </td>
            </tr>
            {/owned}
        </table>
    </div>
</div>
