<meta charset="utf-8">
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>


<div id="root1"></div>
<script type="text/babel">   

    //import React, { useEffect, useState } from "react";
    function Div2(props){
        return (
            <div className="item2" style={{backgroundImage:`url(${props.imagem})`}}>
                {props.children}
            </div>
        );

    }

    


    function Vendas(props){

        const {useState} = React

        const [produtos, setProdutos] = useState([]);

        const obterDados = () => {
            fetch('http://localhost/Projeto_Final_Rui_Rosa/vendasAPI.php')
            .then(response => response.json())
            .then(data => setProdutos(data))
            .catch(error => console.log(error))
        };

        obterDados();

        const myComponentStyle ={
            // height:'100%',
            // width: '40vw',
            // backgroundSize: 'cover',
            // backgroundPosition: 'center',
            // backgroundRepeat: 'no-repeat'
        }


        return (
            <div id="Api2">
                {produtos.map((item)=> <Div2  key={item.idproduto} imagem={item.imagem_url} style={myComponentStyle}></Div2>                                                                                                     
                )}
            </div>
        );
    }


    const root = ReactDOM.createRoot(document.getElementById('root1')); 
    root.render(<Vendas />);   
</script>