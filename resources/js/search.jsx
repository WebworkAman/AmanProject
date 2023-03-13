import React,{ useState } from 'react';

function Search(){
    const [searchQuery, setSearchQuery] = useState('');
    const [data, setData] = useState([]);

    function handleSearch(event){
        const value=event.target.value;
        setSearchQuery(value);

        //根據輸入框的值過濾資料
        
        const filteredData = originalData.filter(item =>
            item.name.toLowerCase().includes(value.toLowerCase())

        );

        //更新狀態中的資料
        setData(filteredData);
    }

    return(
        <div>
            <input type="text" onChange={handleSearch} />
            <ul>
                {data.map(item => (
                    <li key={item.id}>{item.name}</li>
                ))}
            </ul>
        </div>
    )
}