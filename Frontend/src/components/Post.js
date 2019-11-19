import React, { useState, useEffect, Component } from 'react';
import { Container, Row, Col } from 'reactstrap';
import { Card, CardColumns, CardDeck } from 'react-bootstrap';
import axios from 'axios';

     const [items,setItems] = useState([]);
     const [loaded,setLoaded] = useState(false);  
const Kartu = (props) => { 
    const {item} = props;
    return (
        <Card style={{ width: 250} }>
            <Card.Body>
                <Card.Text >
                    nama barang : {item.nama_barang} <br />
                    harga barang : {item.harga_barang} <br/>
                    stok : {item.stok_barang}
                </Card.Text>
            </Card.Body>
        </Card> 
    )
}

const Katalog = () => {  
    useEffect(() => {
        const getCatalogData = async () => {
            setLoaded (true);
            const res = await axios.get('http://127.0.0.1:8000/api/showallcatalog');
            setItems(res.data);
            setLoaded (false);
        }
        getCatalogData();
        //console.log(items);
    });


        return(
            <CardColumns style={{ width: 800 }}> 
                { items.map(item => <Kartu key={item.id}  item={item}/>)}
            </CardColumns> 
        )
        
}


const Posts = ({ items, loaded }) => {
  if (loaded) {
    return <h2>Loading...</h2>;
  }
  return (
    <Katalog/>
  );
};

export default Posts
