<meta charset="utf-8">
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>


<div id="root1"></div>
<script type="text/babel">

    //import React, { useEffect, useState } from "react";

    function Div(props){

        return (
            <div className="item" style={{backgroundImage: `url(${props.imagem})`}}>
                {props.children}
            </div>

        );

    }

    function Produtos(props){

        const {useState} = React

        const [produtos, setProdutos] = useState([]);

        const obterDados = () => {
            fetch('http://localhost/Projeto_Final_Rui_Rosa/vendasAPI.php')
            .then(response => response.json())
            .then(data => setProdutos(data))
            .catch(error => console.log(error))
        };

        obterDados();

        const myComponentStyle = {
            height:'100%', 
            width: '40vw',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: no-repeat
            
        }

        return (
            <div id="Api">
                
                {produtos.map((item)=> <Div  key={item.idproduto} image={item.imagem_url} style={myComponentStyle}>
                                            <h4>{item.produto}</h4>
                                            <h5>{item.marca}</h5>
                                            <p>{item.preco}€</p>
                                           
                                       </Div>
                
                )}
            </div>
        );
    }


    const root = ReactDOM.createRoot(document.getElementById('root1')); 
    root.render(<Produtos />);   
</script>