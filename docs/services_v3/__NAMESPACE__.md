
# services

**Namespace**  : alphayax\freebox\api\v3\services

# Overview

- [config](./config/__NAMESPACE__.md)
    - [NetworkShare](./config/NetworkShare/__NAMESPACE__.md)
        - [Afp](config/NetworkShare/__NAMESPACE__.md#Afp)
        - [Samba](config/NetworkShare/__NAMESPACE__.md#Samba)
    - [SwitchPort](./config/SwitchPort/__NAMESPACE__.md)
        - [Config](config/SwitchPort/__NAMESPACE__.md#Config)
        - [Status](config/SwitchPort/__NAMESPACE__.md#Status)
        - [Stats](config/SwitchPort/__NAMESPACE__.md#Stats)
    - [NAT](./config/NAT/__NAMESPACE__.md)
        - [IncomingPort](config/NAT/__NAMESPACE__.md#IncomingPort)
        - [PortForwarding](config/NAT/__NAMESPACE__.md#PortForwarding)
        - [DMZ](config/NAT/__NAMESPACE__.md#DMZ)
    - [VPN](./config/VPN/__NAMESPACE__.md)
        - [Client](./config/VPN/Client/__NAMESPACE__.md)
            - [Config](config/VPN/Client/__NAMESPACE__.md#Config)
            - [Status](config/VPN/Client/__NAMESPACE__.md#Status)
        - [Server](./config/VPN/Server/__NAMESPACE__.md)
            - [User](config/VPN/Server/__NAMESPACE__.md#User)
            - [Connection](config/VPN/Server/__NAMESPACE__.md#Connection)
            - [Config](config/VPN/Server/__NAMESPACE__.md#Config)
            - [IpPool](config/VPN/Server/__NAMESPACE__.md#IpPool)
    - [Connection](./config/Connection/__NAMESPACE__.md)
        - [DynDns](./config/Connection/DynDns/__NAMESPACE__.md)
            - [DynDns](config/Connection/DynDns/__NAMESPACE__.md#DynDns)
            - [Ovh](config/Connection/DynDns/__NAMESPACE__.md#Ovh)
            - [NoIP](config/Connection/DynDns/__NAMESPACE__.md#NoIP)
        - [Ftth](config/Connection/__NAMESPACE__.md#Ftth)
        - [DynDns](config/Connection/__NAMESPACE__.md#DynDns)
        - [Connection](config/Connection/__NAMESPACE__.md#Connection)
        - [Xdsl](config/Connection/__NAMESPACE__.md#Xdsl)
    - [UPnP](./config/UPnP/__NAMESPACE__.md)
        - [IGD](config/UPnP/__NAMESPACE__.md#IGD)
        - [AV](config/UPnP/__NAMESPACE__.md#AV)
    - [LAN](./config/LAN/__NAMESPACE__.md)
        - [Browser](config/LAN/__NAMESPACE__.md#Browser)
        - [LAN](config/LAN/__NAMESPACE__.md#LAN)
    - [WiFi](./config/WiFi/__NAMESPACE__.md)
        - [Bss](config/WiFi/__NAMESPACE__.md#Bss)
        - [AccessPoint](config/WiFi/__NAMESPACE__.md#AccessPoint)
        - [Config](config/WiFi/__NAMESPACE__.md#Config)
        - [MacFilter](config/WiFi/__NAMESPACE__.md#MacFilter)
        - [Planning](config/WiFi/__NAMESPACE__.md#Planning)
    - [LCD](config/__NAMESPACE__.md#LCD)
    - [FTP](config/__NAMESPACE__.md#FTP)
    - [DHCP](config/__NAMESPACE__.md#DHCP)
    - [System](config/__NAMESPACE__.md#System)
    - [Freeplug](config/__NAMESPACE__.md#Freeplug)
- [AirMedia](./AirMedia/__NAMESPACE__.md)
    - [AirMediaReceiver](AirMedia/__NAMESPACE__.md#AirMediaReceiver)
    - [Config](AirMedia/__NAMESPACE__.md#Config)
- [login](./login/__NAMESPACE__.md)
    - [Session](login/__NAMESPACE__.md#Session)
    - [Association](login/__NAMESPACE__.md#Association)
- [RRD](./RRD/__NAMESPACE__.md)
    - [Fetch](RRD/__NAMESPACE__.md#Fetch)
- [download](./download/__NAMESPACE__.md)
    - [BlackList](download/__NAMESPACE__.md#BlackList)
    - [Tracker](download/__NAMESPACE__.md#Tracker)
    - [Peer](download/__NAMESPACE__.md#Peer)
    - [Download](download/__NAMESPACE__.md#Download)
    - [Feed](download/__NAMESPACE__.md#Feed)
    - [Configuration](download/__NAMESPACE__.md#Configuration)
- [ParentalControl](./ParentalControl/__NAMESPACE__.md)
    - [FilterPlanning](ParentalControl/__NAMESPACE__.md#FilterPlanning)
    - [Filter](ParentalControl/__NAMESPACE__.md#Filter)
- [Storage](./Storage/__NAMESPACE__.md)
    - [Partition](Storage/__NAMESPACE__.md#Partition)
    - [Disk](Storage/__NAMESPACE__.md#Disk)
- [FileSystem](./FileSystem/__NAMESPACE__.md)
    - [FileSystemOperation](FileSystem/__NAMESPACE__.md#FileSystemOperation)
    - [FileSystemListing](FileSystem/__NAMESPACE__.md#FileSystemListing)
    - [FileUpload](FileSystem/__NAMESPACE__.md#FileUpload)
    - [FileSystemTask](FileSystem/__NAMESPACE__.md#FileSystemTask)
    - [FileSharingLink](FileSystem/__NAMESPACE__.md#FileSharingLink)
- [Call](./Call/__NAMESPACE__.md)
    - [Contact](./Call/Contact/__NAMESPACE__.md)
        - [ContactNumber](Call/Contact/__NAMESPACE__.md#ContactNumber)
        - [ContactUrl](Call/Contact/__NAMESPACE__.md#ContactUrl)
        - [ContactAddress](Call/Contact/__NAMESPACE__.md#ContactAddress)
        - [ContactEntry](Call/Contact/__NAMESPACE__.md#ContactEntry)
        - [ContactEmail](Call/Contact/__NAMESPACE__.md#ContactEmail)
    - [CallEntry](Call/__NAMESPACE__.md#CallEntry)
- [ApiVersion](__NAMESPACE__.md#ApiVersion)


---
<a name="ApiVersion"></a>
## ApiVersion

**Class**  : alphayax\freebox\api\v3\services\ApiVersion

### Public methods

| Method | Description |
|---|---|
| `getApiVersion` | Return a mapping of information about the api |
