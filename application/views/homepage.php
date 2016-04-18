<hr/>

<div id="playersPanel">
    {players}
    <hr>
    <table>
        <tr>
            <td rowspan="3">
                <img src="{image}"/>
            </td>
            <td>
                <p><a href="{href}"><p>{username}</p></a>
            </td>
        </tr>
        <tr>
            <td>
                <p>Equity:</p>
                <p>Cash: {cash}</p>
            </td>
        </tr>
    </table>
    {/players}
    <hr>
</div>

<div id="transactionsPanel">
    <h1>Game</h1>
    <table class="center">
        <hr>
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
    <hr>
</div>

<div id="stocksPanel">
    {stockportfolios}
    <hr id="line"/>
    Stock: <a href="/stock/{code}">{name}</a>
    <br>
    Code: {code}
    <br>
    Category: {category}
    <br>
    Value: {value}
    {/stockportfolios}
</div> 

