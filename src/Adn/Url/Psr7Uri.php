<?php
namespace Adn\Url;


use InvalidArgumentException;
use Psr\Http\Message\UriInterface;

class Psr7Uri implements UriInterface
{
    /**
     * @var Url
     */
    private $url;

    /**
     *
     * @param Url $url
     */
    public function __construct(Url $url)
    {
        $this->url = clone $url;
    }

    /**
     * @param Url $url
     * @return Psr7Uri
     */
    static function fromUrl(Url $url)
    {
        return new static($url);
    }

    /**
     * @param string $url
     * @return Psr7Uri
     */
    static function parse($url)
    {
        return new static(Url::parse($url));
    }

    public function toUrl()
    {
        return clone $this->url;
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->url->getScheme();
    }

    /**
     * @return string
     */
    public function getAuthority(): string
    {
        return $this->url->getAuthority();
    }

    /**
     * @return string
     */
    public function getUserInfo(): string
    {
        return $this->url->getUserInfo();
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->url->getHost();
    }

    /**
     * @return int|null The URI port.
     */
    public function getPort(): int|null
    {
        return $this->url->getPort();
    }

    /**
     * @return string The URI path.
     */
    public function getPath(): string
    {
        return $this->url->getPath();
    }

    /**
     * @return string The URI query string.
     */
    public function getQuery(): string
    {
        return $this->url->getQuery();
    }

    /**
     * @return string The URI fragment.
     */
    public function getFragment(): string
    {
        return $this->url->getFragment();
    }

    /**
     * @param string $scheme The scheme to use with the new instance.
     * @return static A new instance with the specified scheme.
     * @throws InvalidArgumentException for invalid or unsupported schemes.
     */
    public function withScheme(string $scheme)
    {
        return new static($this->url->withScheme($scheme));
    }

    /**
     * @param string $user The user name to use for authority.
     * @param null|string $password The password associated with $user.
     * @return static A new instance with the specified user information.
     */
    public function withUserInfo(string $user, ?string $password = null)
    {
        return new static($this->url->withUserInfo($user, $password));
    }

    /**
     * @param string $host The hostname to use with the new instance.
     * @return static A new instance with the specified host.
     * @throws InvalidArgumentException for invalid hostnames.
     */
    public function withHost(string $host)
    {
        return new static($this->url->withHost($host));
    }

    /**
     * @param null|int $port The port to use with the new instance; a null value
     * removes the port information.
     * @return static A new instance with the specified port.
     * @throws InvalidArgumentException for invalid ports.
     */
    public function withPort(?int $port)
    {
        return new static($this->url->withPort($port));
    }

    /**
     * @param string $path The path to use with the new instance.
     * @return static A new instance with the specified path.
     * @throws InvalidArgumentException for invalid paths.
     */
    public function withPath(string $path)
    {
        return new static($this->url->withPath($path));
    }

    /**
     * @param string $query The query string to use with the new instance.
     * @return static A new instance with the specified query string.
     * @throws InvalidArgumentException for invalid query strings.
     */
    public function withQuery(string $query)
    {
        return new static($this->url->withQuery($query));
    }

    /**
     * @param string $fragment The fragment to use with the new instance.
     * @return static A new instance with the specified fragment.
     */
    public function withFragment(string $fragment)
    {
        return new static($this->url->withFragment($fragment));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->url;
    }

}