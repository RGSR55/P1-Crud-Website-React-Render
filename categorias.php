<meta charset="utf-8">
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>


<div id="root3"></div>
<script type="text/babel">

    //import React, { useEffect, useState } from "react";

    // function Div(props){
    //     return (
    //         <div className="item" style={{backgroundImage:`url(${props.imagem})`}}>
    //             {props.children}
    //         </div>
            

    //     );

        

    // }

    function Categorias(props){

        const {useState} = React

        const [produtos, setProdutos] = useState([]);

        const obterDados = () => {
            fetch('http://localhost/Projeto_Final_Rui_Rosa/categoriasAPI.php')
            .then(response => response.json())
            .then(data => setProdutos(data))
            .catch(error => console.log(error))
        };

        obterDados();

        // const myComponentStyle ={
        //     // height:'100%',
        //     // width: '40vw',
        //     // backgroundSize: 'cover',
        //     // backgroundPosition: 'center',
        //     // backgroundRepeat: 'no-repeat'
        // }

        return (
            <div id="Api" >
                
                {produtos.map((item)=> <div  key={item.idcategoria}  >
                                            
                                            
                                <a href={"index.php?opcao=lista_proteinas&cat="+item.idcategoria}>
                                <img src={item.imagem} /></a>
                                            

                                       </div>
                
                )}
            </div>
        );
    }


    const root = ReactDOM.createRoot(document.getElementById('root3')); 
    root.render(<Categorias />);   
</script>