<div class="row">
    <h2><strong>{username}</strong></h2>
    <div>
        <form action='<?php echo base_url() ?>Stocks/buy' method='post'>
            <table>
                <tr>
                    <td>
                        <select name="stock">
                            {stocks}
                            <option value="{code}">{name}</option>
                            {/stocks}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select>
                            {players}
                            <option value="{id}">{username}</option>
                            {/players}
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
