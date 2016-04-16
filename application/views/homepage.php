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
    <p><a href="{href}"><p>{who}</p></a>
    <p>Equity: <br/>Cash:</p>
    {/portfolios}
    <hr>
</div>