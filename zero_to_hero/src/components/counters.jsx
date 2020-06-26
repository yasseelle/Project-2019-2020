import React, { Component } from 'react';
import Counter from './counter'

export default class Counters extends Component {
    state = {
        counters: [
            { id: 1, value: 15 },
            { id: 2, value: 22 },
            { id: 3, value: 32 },
            { id: 4, value: 14 }

        ]
    }
    render() {
        return (
            <div>
                {this.state.counters.map(counter =>
                    <Counter key={counter.id} value={counter.value} id={counter.id} />
                )}
            </div>
        )
    }
}

