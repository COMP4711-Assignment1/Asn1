<div class="row">
    <h2><strong>{username}</strong></h2>
    <div>
        <form action='<?php echo base_url() ?>Stocks/buy' method='post'>
            <table>
                <tr>
                    <td>
                        Stocks: 
                    </td>
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
                        Amount: 
                    </td>
                    <td>
                        <input type="number" name="number" min="0" max="100" step="1" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Buy" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


