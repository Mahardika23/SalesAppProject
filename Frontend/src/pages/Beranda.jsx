import React, { useState, Component } from 'react';
import {NavigatorBar} from '../components/Navbar.js'
import SearchPage from '../components/Search';
import './Beranda.css'
import { Container, Row, Col } from 'reactstrap';
import Posts from '../components/Post'
import Pagination from '../components/Pagination'
     

    const [currentPage, setCurrentPage] = useState(1);
    const [postsPerPage] = useState(10);  
    const indexOfLastPost = currentPage * postsPerPage;
    const indexOfFirstPost = indexOfLastPost - postsPerPage;
    const currentPosts = this.items.slice(indexOfFirstPost, indexOfLastPost);

    // Change page
    const paginate = pageNumber => setCurrentPage(pageNumber);
class Beranda extends Component {
    render(){
        return(
            <div style={{backgroundColor:'#E4DFEC'}}>
                <NavigatorBar/>
                <div >
                     <div className="container">
                        <SearchPage/>
                    </div>
                    <div  style={{padding:'50px'}} className='content'>
                        <div style={{backgroundColor:''}}>
                            <h2>Katalog Produk</h2>
                            <div className="container">
                            <Posts items={this.items} loaded={this.loaded} />
                            <Pagination
                                postsPerPage={this.postsPerPage}
                                totalPosts={this.items.length}
                                paginate={paginate}
                            />
                            </div>
                        </div>
                        <div>
                            <h2>Peta Distributor</h2>
                            <div className='peta' >
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        )
    }
}

export default Beranda;
