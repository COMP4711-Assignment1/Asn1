<hr/>
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

<div id="playersPanel">
    {portfolios}
    <hr>
    <table>
        <tr>
            <td rowspan="3">
                <img src="{image}"/>
            </td>
            <td>
                <p><a href="{href}"><p>{who}</p></a>
            </td>
        </tr>
        <tr>
            <td>
                <p>Equity:<br/>Cash:</p>
            </td>
        </tr>
    </table>
    {/portfolios}
    <hr>
</div>