<td>{{ mb_substr($item->{$itemField['name']}, 0, 50, 'UTF-8').(strlen($item->{$itemField['name']}) > 50 ? '...' : '') }}</td>
